import pandas as pd

# Load the dataset
file_path = 'games.csv'
games_data = pd.read_csv(file_path)

# Get unique genres from the dataset for the frontend (to allow users to select multiple genres)
def get_available_genres():
    # Split the genres in each row and extract unique genres
    all_genres = games_data['genres'].str.split(',').explode().unique()
    return sorted(all_genres)

# Function to recommend games based on selected genres and category
def recommend_games(selected_genres, selected_category):
    # If "None" is selected for genres, don't filter by genre
    if "None" in selected_genres:
        selected_genres = []

    # Filter the dataset based on selected genres (handle multiple genres selection)
    if selected_genres:
        genre_filter = games_data['genres'].apply(lambda x: all(genre in x for genre in selected_genres))
        filtered_games = games_data[genre_filter]
    else:
        filtered_games = games_data

    # If no category is selected, consider both Single-player and Multi-player
    if not selected_category:
        selected_category = ['Single-player', 'Multi-player']

    # Further filter by selected categories (handle multiple categories selection)
    category_filter = filtered_games['categories'].apply(lambda x: all(category in x for category in selected_category))
    filtered_games = filtered_games[category_filter]
    
    # Calculate the recommendation score
    filtered_games['recommend'] = filtered_games['pos'] - filtered_games['neg']
    
    # Ensure that recommend is a valid column and handle any missing values
    filtered_games['recommend'] = filtered_games['recommend'].fillna(0)  # Replace NaN values with 0

    # Sort the filtered games by recommend (descending) and take the top 10
    top_games = filtered_games.sort_values(by='recommend', ascending=False).head(10)
    
    # Return the top 10 recommended games
    return top_games[['name', 'genres', 'categories', 'recommend']]