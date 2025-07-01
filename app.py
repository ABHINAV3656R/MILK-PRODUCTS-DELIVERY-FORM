from flask import Flask, request, jsonify
from flask_cors import CORS
import mysql.connector

app = Flask(__name__)
CORS(app)

# Connect Flask to MySQL Workbench
db = mysql.connector.connect(
    host="localhost",
    user="root",  # Change if you use a different MySQL user
    password="",  # Add your MySQL password if set
    database="milk_delivery"
)
cursor = db.cursor()

# Login API
@app.route('/login', methods=['POST'])
def login():
    data = request.json
    username, password = data['username'], data['password']

    cursor.execute("SELECT * FROM users WHERE username=%s AND password=%s", (username, password))
    user = cursor.fetchone()

    if user:
        return jsonify({"message": "Login successful!", "user_id": user[0]}), 200
    else:
        return jsonify({"error": "Invalid credentials"}), 401

if __name__ == '__main__':
    app.run(debug=True, port=5000)
