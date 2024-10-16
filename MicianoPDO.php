<?php

$host = "localhost"; 
$username = "root"; 
$password = "";   
$dbname = "library";
$data_source_name = "mysql:host=$host; dbname=$dbname";
$conn = new PDO($data_source_name , $username, $password);
$conn-> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
$statement = $conn->query("SELECT * FROM  books");
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

// I was having errors on the code demonstrated at the live session, so I used chat gpt to correct some of the code
// ------------------------------------------------------------------------------------------------------------
// The code below uses INESERT statement to add a new book
/*

$title = "Hatchet";
$author = "Gary Paulsen";
$published_year = "1987";
$genre = "Young_adult_novel";

$sql = "INSERT INTO books (title, author, published_year, genre) 
        VALUES (:title, :author, :published_year, :genre)";
$statement = $conn->prepare($sql);
$data = [
    'title' => $title,
    'author' => $author,
    'published_year' => $published_year,
    'genre' => $genre
];
$statement->execute($data);
*/
// ------------------------------------------------------------------------------------------------------------
// The code below uses SELECT statment to retrieve all books and print them in a readable format
/*

$sql = "SELECT * FROM books";
$statement = $conn->prepare($sql);
$statement->execute(); // Execute the query first
$books = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($books as $book) 
{
    echo $book['title'] . " > " . $book['author'] . " > " . $book['published_year'] . " > " . $book['genre'] . "<br />";
}
*/

// ------------------------------------------------------------------------------------------------------------
// The code below uses UPDATE statement to modify a book's details
/*

$sql = "UPDATE books SET genre = :genre WHERE title = :title";
$statement=$conn->prepare($sql);
$statement->execute([
    ':genre' => 'Science Fiction',
    ':title' => 'Hatchet'
]);
*/

// ------------------------------------------------------------------------------------------------------------
// The code below uses a DELETE statement to remove a book from the table.

$sql = "DELETE FROM books WHERE title = :title";
$statement=$conn->prepare($sql);
$statement->execute([':title' => 'Hatchet']);


?>