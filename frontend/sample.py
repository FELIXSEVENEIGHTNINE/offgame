import numpy as np
# import pandas as pd
# from scipy import sparse
# from sklearn.metrics.pairwise import cosine_similarity

from pyscript import document

output_div = document.querySelector('#output')
output_div.innerText = np.arange(4)

# plt.plot([0,1,2,3,4,5,6])
# plt.ylabel("random nos")

# output_div.innerText = plt

# l = ["a", "b", "c", "d"]
# df=pd.DataFrame(l)

# output_div.innerText = df


# import pandas as pd

# df = pd.read_csv('games_edit.csv')
# df.dropna(inplace = True)
# # print(df.tostring())

# output_div = document.querySelector('#output')
# output_div.innerText = df.tostring()