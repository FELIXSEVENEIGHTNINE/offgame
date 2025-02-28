import pandas as pd
from pyscript import document

data = pd.read_csv('assets/dataset.csv')

def translate_english(event):
    output_div = document.querySelector("#output")
    output_div.innerText = print(data)