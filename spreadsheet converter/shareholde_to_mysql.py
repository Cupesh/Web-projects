import os
import openpyxl
import json

spreadsheet = 'TMA_shareholders.xlsx'

wb = openpyxl.load_workbook(spreadsheet, data_only=True)
sheet = wb.active

person = []

pos = 1

gender = sheet['D'][pos].value
if gender == 'female':
    gender = "f"
elif gender == "male":
    gender = "m"
else:
    gender = None

mobile = sheet['K'][pos].value
if mobile != None:
    mobile = str(mobile).strip()
    if mobile[0] != '0':
        mobile = '0' + mobile
else:
    mobile = None

landline = sheet['J'][pos].value
if landline != None:
    landline = str(landline).strip()
    if landline[0] != '0':
        landline = '0' + landline
else:
    landline = None

person_details = [sheet['C'][pos].value, sheet['A'][pos].value, sheet['B'][pos].value, str(sheet['E'][pos].value)[:10], gender, sheet['F'][pos].value, sheet['G'][pos].value, sheet['H'][pos].value, sheet['I'][pos].value, sheet['L'][pos].value, mobile, landline]

for i in person_details:
    if i == None:
        person.append(None)
    else:
        person.append("\'{}\'".format(str(i).strip()))

print(person)

with open('shareholder.JSON', 'w') as f:
    json.dump(person, f)