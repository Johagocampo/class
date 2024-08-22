from flask import Flask
from flask import render_template

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html',page='index')

@app.route('/mision')
def mision():
    return render_template('mision.html',page='mision')