import os
import openpyxl
import json

spreadsheet = 'TMA_Employees.xlsx'

wb = openpyxl.load_workbook(spreadsheet, data_only=True)
sheet = wb.active

person = []

pos = 1

gender = sheet['K'][pos].value
if gender == 'female':
    gender = "f"
elif gender == "male":
    gender = "m"
else:
    gender = None

mobile = sheet['AC'][pos].value
if mobile != None:
    mobile = str(mobile).strip()
    if mobile[0] != '0':
        mobile = '0' + mobile
else:
    mobile = None

landline = sheet['AA'][pos].value
if landline != None:
    landline = str(landline).strip()
    if landline[0] != '0':
        landline = '0' + landline
else:
    landline = None

person_details = [sheet['G'][pos].value, sheet['E'][pos].value, sheet['F'][pos].value, str(sheet['I'][pos].value)[:10], gender, sheet['S'][pos].value, sheet['U'][pos].value, sheet['W'][pos].value, sheet['Y'][pos].value, sheet['AE'][pos].value, mobile, landline]

for i in person_details:
    if i == None:
        person.append(None)
    else:
        person.append("\'{}\'".format(i.strip()))

print(person)