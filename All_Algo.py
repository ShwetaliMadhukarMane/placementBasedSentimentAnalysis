import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.feature_extraction.text import CountVectorizer

from sklearn import metrics
from sklearn.pipeline import make_pipeline
import Preforcessing
# Example using NLTK for data cleaning
from nltk.corpus import stopwords
from nltk.stem import PorterStemmer
import string
from sklearn.naive_bayes import MultinomialNB
from sklearn.ensemble import RandomForestClassifier
from sklearn.neighbors import KNeighborsClassifier
from sklearn.tree import DecisionTreeClassifier

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
model1 = make_pipeline(TfidfVectorizer(stop_words='english'), RandomForestClassifier())
model2 = make_pipeline(TfidfVectorizer(stop_words='english'), KNeighborsClassifier())
model3 = make_pipeline(TfidfVectorizer(stop_words='english'), DecisionTreeClassifier())

print("Naive Bayes-------------------------------")
# Train the model
model.fit(X_train, y_train)
# Make predictions
y_pred = model.predict(X_test)
# Print classification report
print(metrics.classification_report(y_test, y_pred))
# Print confusion matrix
print("Confusion Matrix:")
print(metrics.confusion_matrix(y_test, y_pred))
# Calculate accuracy
accuracy = metrics.accuracy_score(y_test, y_pred)
print(f"Accuracy: {accuracy}")

print("RandomForestClassifier-------------------------------")
# Train the model
model1.fit(X_train, y_train)
# Make predictions
y_pred1 = model1.predict(X_test)
# Print classification report
print(metrics.classification_report(y_test, y_pred1))
# Print confusion matrix
print("Confusion Matrix:")
print(metrics.confusion_matrix(y_test, y_pred1))
# Calculate accuracy
accuracy1 = metrics.accuracy_score(y_test, y_pred1)
print(f"Accuracy: {accuracy1}")

print("KNeighborsClassifier-------------------------------")
# Train the model
model2.fit(X_train, y_train)
# Make predictions
y_pred2 = model2.predict(X_test)
# Print classification report
print(metrics.classification_report(y_test, y_pred2))
# Print confusion matrix
print("Confusion Matrix:")
print(metrics.confusion_matrix(y_test, y_pred2))
# Calculate accuracy
accuracy2 = metrics.accuracy_score(y_test, y_pred2)
print(f"Accuracy: {accuracy2}")

print("DecisionTreeClassifier-------------------------------")
# Train the model
model3.fit(X_train, y_train)
# Make predictions
y_pred3 = model3.predict(X_test)
# Print classification report
print(metrics.classification_report(y_test, y_pred3))
# Print confusion matrix
print("Confusion Matrix:")
print(metrics.confusion_matrix(y_test, y_pred3))
# Calculate accuracy
accuracy3 = metrics.accuracy_score(y_test, y_pred3)
print(f"Accuracy: {accuracy3}")
