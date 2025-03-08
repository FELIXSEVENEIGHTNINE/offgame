from tabulate import tabulate
import pandas as pd

origin = pd.read_csv('games.csv', header=None, low_memory=False)

# print(tabulate(origin))

# print(tabulate(origin.head(20)))

# print(tabulate(origin.tail(20)))

# print(tabulate(origin.describe()))

# print(origin.nunique())

# columns = origin.iloc[0]
# print(columns)

user = pd.read_csv('user.csv', header=None, low_memory=False)

# print(tabulate(user))

dataset = pd.merge(origin, user, "inner", "")
print(tabulate(dataset.tail()))
