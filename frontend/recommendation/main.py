from tabulate import tabulate
import pandas as pd
from sklearn.metrics.pairwise import cosine_similarity

origin = pd.read_csv('games.csv', header=None, low_memory=False)

# print(origin.duplicated(subset='game_name').sum())

# print(tabulate(origin))

# print(tabulate(origin.head(20)))

# print(tabulate(origin.tail(20)))

# print(tabulate(origin.describe()))

# print(origin.nunique())

# columns = origin.iloc[0]
# print(columns)

# user = pd.read_csv('user.csv', header=None, low_memory=False)

# print(tabulate(user))

# dataset = pd.merge(origin, user, "inner", "")
# print(tabulate(dataset.tail()))
#
similarities = cosine_similarity(origin)

df = pd.DataFrame(similarities, columns=origin['Book-Title'], index=origin['Book-Title']).reset_index()

print(df.head())

# input_game = "Five Night's at Freddy's"
# recommendations = pd.DataFrame(origin.nlargest(11,input_game)['game_name'])
# reco = recommendations['game_name']!=input_game
# recommendations = recommendations[reco]
# print(recommendations)