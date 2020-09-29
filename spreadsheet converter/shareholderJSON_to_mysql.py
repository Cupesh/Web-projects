import os
import json

person = None

with open('shareholder.json', 'r') as f:
    person = json.load(f)

final = ''
for i in person:
    if i == None:
        final = final + 'null' + ', ' 
        continue
    final = final + i + ', '

print(final)