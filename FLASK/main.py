from flask import Flask
from flask import render_template

app = Flask (__name__)

@app.route('/')
def home():
    return 'welcome to Flask App!'

@app.route('/hello')
def hello():
    return 'hello'

@app.route('/html')
def html():
    return render_template('index.html')