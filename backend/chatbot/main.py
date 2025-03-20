import threading
import ollama
import pickle
import faiss
import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware

app = FastAPI()

origins = [
    "http://localhost",
    "http://localhost:8080",
    "http://localhost:8081",
    "http://192.168.64.19",
    "http://192.168.64.19:8080",
    "http://192.168.64.19:8081"
]

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

first_reply = True


# 📌 STEP 1: Load Preprocessed Dataset
df = pd.read_csv("preprocessed_games.csv")

# 📌 STEP 2: Load FAISS Index and Vectorizer (Error Handling Added)
try:
    with open("vectorizer.pkl", "rb") as f:
        vectorizer = pickle.load(f)

    index = faiss.read_index("game_index.faiss")

except FileNotFoundError:
    print("❌ Error: FAISS index or vectorizer file not found. Run `generate_embeddings.py` first!")
    exit()

# 📌 STEP 3: Function to Recommend Games
def recommend_games(query):
    query_vec = vectorizer.transform([query]).toarray().astype('float32')
    _, indices = index.search(query_vec, 5)  # Get top 5 similar games
    
    # Ensure at least one recommendation exists
    if len(indices[0]) == 0 or indices[0][0] == -1:
        return "❌ No relevant games found. Try a different search query!"

    recommendations = df.iloc[indices[0]]

    response = "🎮 **Recommended Games:**\n\n"
    for _, row in recommendations.iterrows():
        response += f"**{row['Name']}** - {row['Genres']}\n💰 Price: ${row['Price']}\n\n"
    return response.strip()

prompt = None
response = None

# 📌 STEP 4: AI Chatbot Using Ollama (Updated for LLaMA 3.2)
def chatbot():
    print("🎮 AI Game Recommender Chatbot (LLaMA 3.2) 🎮 (Type 'exit' to quit)")
    
    while True:
        global prompt, response
        if prompt != None:
            user_input = "\nYou: " + prompt
            print(user_input)
            prompt = None
            if user_input.lower() in ["exit", "quit"]:
                print("Goodbye! 🎮")
                response = "Goodbye! 🎮"
                # break

            recommendations = recommend_games(user_input)
            
            # Handle case where no games are found
            if "❌ No relevant games found" in recommendations:
                print(f"\nOllama AI: {recommendations}")
                response = "Ollama AI: " + recommendations
                continue
            
            # Generate response using LLaMA 3.2
            ai_prompt = f"A user is looking for game recommendations based on: {user_input}. Recommend based on the following games:\n\n{recommendations}"
            print(user_input.split()[1][1:])
            if user_input.split()[1][1:].upper() in ["WHAT", "WHY", "WHERE", "HOW", "WHO", "WHEN", "WHICH"]:
                print("Printing Plain Prompt")
                ai_prompt = f"{user_input}"

            
            try:
                ai_response = ollama.chat(model="llama3.2", messages=[{"role": "user", "content": ai_prompt}])
                response = ai_response['message']['content']
                print(f"\nOllama AI: {response}")
            
            except Exception as e:
                print(f"❌ Error generating response from Ollama: {e}")
                response = "❌ Error generating response from Ollama: " + e


@app.get("/chatbot-api")
def chatbot_api(message: str):
    print("Message: " + message)
    global prompt
    global response
    prompt = message
    while response == None:
        continue
    reply = response
    response = None
    return reply

thread1 = None
def start_thread():
    global thread1, thread2
    thread1 = threading.Thread(target=chatbot, name='chatbot')
    thread1.start()

# Run chatbot
start_thread()