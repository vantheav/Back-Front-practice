<template>
  <section>
    <header>
      <h1>My books</h1>
    </header>
    <book-form @add-book="addBook"></book-form>
    <ul>
      <book-card 
      v-for="book of bookList" 
      :key='book.id'
      :book="book" 
      @delete-book="deleteBook"
      ></book-card>
    </ul>
  </section>
</template>

<script>
import axios from "axios";
let url = "http://127.0.0.1:3000/api/book";
export default {
  data() {
    return {
      bookList: []
    };
  },
  methods: {
    deleteBook(bookId){
     axios.delete(url + "/" + bookId).then(() => {
        this.bookList = this.bookList.filter((book) => book.id != bookId)
         console.log("Deleted")
     })
    
    },
    addBook(title, description){
      const newBook = {
        id: new Date().toISOString(),
        title: title,
        description: description
      }
     
      axios.post(url, newBook).then(res => {
        this.bookList.push(res.data.book)
        console.log("Created")
      })
    }
  },
  mounted() {
    axios.get(url).then(res => {
      this.bookList = res.data;
    
    })
  },
};
</script>

<style>
:root {
  --main-color: #3a2dfc;
}

* {
  box-sizing: border-box;
}

html {
  font-family: sans-serif;
}

body {
  margin: 0;
}

header {
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
  margin: 3rem auto;
  border-radius: 10px;
  padding: 1rem;
  background-color: var(--main-color);
  color: white;
  text-align: center;
  width: 90%;
  max-width: 40rem;
}

ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

button {
  cursor: pointer;
  border: 1px solid var(--main-color);
  background-color: var(--main-color);
  color: white;
  padding: 0.5rem 1rem;
  box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.26);
}

button:hover,
button:active {
  box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.26);
}
</style>