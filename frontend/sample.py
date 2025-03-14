import numpy as np
import pandas as pd

from pyscript import document

output_div = document.querySelector('#output')
output_div.innerText = np.arange(4)

input_text = document.querySelector("#game_name")
