from flask import Flask, render_template, request
from recommend import recommend_games, get_available_genres  # Import the functions
from fastapi import FastAPI, Query
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel


app = FastAPI()

origins = [
    "http://localhost",
    "http://localhost:8080",
    "http://localhost:8082",
    "http://192.168.64.19",
    "http://192.168.64.19:8080",
    "http://192.168.64.19:8082"
]

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# app = Flask(__name__)

# @app.route('/')
# def index():
#     # Get available genres for the dropdown (allow user to select multiple genres)
#     available_genres = get_available_genres()
#     return render_template('index.html', genres=available_genres)

# @app.route('/recommend', methods=['POST'])
# def recommend():
#     # Get selected genres and category from the form
#     selected_genres = []
#     selected_category = []

#     for i in request.form:
#         for a in request.form.getlist('genre'):
#             selected_genres.append(a) # This will get a list of selected genres
            
#         for b in request.form.getlist('category'):
#             selected_category.append(b)  # This will get a list of selected categories
    
#     # Call the recommend_games function from recommend.py
#     try:
#         recommended_games = recommend_games(selected_genres, selected_category)
#     except:
#         available_genres = get_available_genres()
#         return render_template('index.html', genres=available_genres)

#     return render_template('recommendations.html', games=recommended_games)

# if __name__ == '__main__':
#     app.run(debug=True, port=5001)

class Item(BaseModel):
    genre: list = []
    category: list = []

@app.get("/available-genres")
def availGames():
    return 0

@app.post("/items")
def recomGames(genre: list[str, None] = Query(...), category: list[str, None] = Query(...)):
    print(genre, category)
    selected_genres = []
    selected_category = []
    for a in genre:
        print(type(a))
        selected_genres.append(a) # This will get a list of selected genres
        
    for b in category:
        selected_category.append(b)

    return_val = []
    
    recommended_games = recommend_games(selected_genres, selected_category)
    names = list(recommended_games['name'])
    genres = list(recommended_games['genres'])
    categories = list(recommended_games['categories'])
    recommend = list(recommended_games['recommend'])

    for c in range(len(names)):
        data = []

        data.append(names[c])
        data.append(genres[c])
        data.append(categories[c])
        data.append(recommend[c])

        return_val.append(data)

    return return_val