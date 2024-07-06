import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.naive_bayes import MultinomialNB
from sklearn import metrics
from sklearn.pipeline import make_pipeline
import Preforcessing
# Example using NLTK for data cleaning
from nltk.corpus import stopwords
from nltk.stem import PorterStemmer
import string
from sklearn.ensemble import RandomForestClassifier
from sklearn.feature_extraction.text import TfidfVectorizer


# Load the dataset
df = pd.read_csv('Dataset.csv')  # Replace with the actual path

# Display the first few rows of the dataset
print(df.head())

# Display the data cleaning
df = Preforcessing.data_cleaning(df)
print("data cleaning")

# StopWords Cleaning
df = Preforcessing.data_StopWordsCleaning(df)
df.to_csv('StopWordsCleaning.csv', sep=',', index=False)
print("StopWords Cleaning")

# TokenizationLemmatization Cleaning
df = Preforcessing.data_TokenizationLemmatization(df)
df.to_csv('TokenizationLemmatization.csv', sep=',', index=False)
print("Tokenization")

# Split the dataset into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(df['review'], df['sentiment'], test_size=0.25, random_state=42)



#Create a pipeline with CountVectorizer and Multinomial Naive Bayes
#model = make_pipeline(CountVectorizer(stop_words='english'), MultinomialNB())

#Example of hyperparameter tuning
#model = make_pipeline(CountVectorizer(stop_words='english', min_df=5, max_df=0.8), MultinomialNB(alpha=0.1))


# Example using TfidfVectorizer
model = make_pipeline(TfidfVectorizer(stop_words='english'), MultinomialNB())


# Train the model
model.fit(X_train, y_train)

#from sklearn.externals import joblib  # Import joblib for model persistence
import joblib  # Import joblib for model persistence
joblib.dump(model, 'sentiment_model.joblib')

# Load the model from the file
loaded_model = joblib.load('sentiment_model.joblib')

# Make predictions
y_pred = loaded_model.predict(X_test)

# Print classification report
print(metrics.classification_report(y_test, y_pred))

# Print confusion matrix
print("Confusion Matrix:")
print(metrics.confusion_matrix(y_test, y_pred))

# Calculate accuracy
accuracy = metrics.accuracy_score(y_test, y_pred)
print(f"Accuracy: {accuracy}")

def preprocess_text(text):
    stop_words = set(stopwords.words('english'))
    stemmer = PorterStemmer()
    
    # Remove punctuation and convert to lowercase
    text = "".join([char.lower() for char in text if char not in string.punctuation])
    
    # Remove stop words and apply stemming
    text = " ".join([stemmer.stem(word) for word in text.split() if word not in stop_words])
    
    return text

while True:
    # User input for movie review
    user_input = input("Enter a comment (To Exit Enter ***-: ")
    if user_input=='***':
        break

    user_input = preprocess_text(user_input)
    user_review = [user_input]

    # Predict sentiment for user input
    user_pred = loaded_model.predict(user_review)

    # Print the predicted sentiment
    print(f"Predicted sentiment: {user_pred[0]}")

