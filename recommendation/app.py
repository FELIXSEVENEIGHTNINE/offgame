from flask import Flask, render_template, request
from recommend import recommend_games, get_available_genres  # Import the functions

app = Flask(__name__)

@app.route('/')
def index():
    # Get available genres for the dropdown (allow user to select multiple genres)
    available_genres = get_available_genres()
    return render_template('index.html', genres=available_genres)

@app.route('/recommend', methods=['POST'])
def recommend():
    # Get selected genres and category from the form
    selected_genres = []
    selected_category = []

    for i in request.form:
        for a in request.form.getlist('genre'):
            selected_genres.append(a) # This will get a list of selected genres
            
        for b in request.form.getlist('category'):
            selected_category.append(b)  # This will get a list of selected categories
    
    # Call the recommend_games function from recommend.py
    try:
        recommended_games = recommend_games(selected_genres, selected_category)
    except:
        available_genres = get_available_genres()
        # return render_template('index.html', genres=available_genres)
        return null

    return render_template('recommendations.html', games=recommended_games)

if __name__ == '__main__':
    app.run(debug=True, port=5001)