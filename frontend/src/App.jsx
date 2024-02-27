import { useState,useEffect } from 'react';
import NewNoteButton from './NewNoteButton.jsx';
import axios from 'axios';
import Note from './Note.jsx';
import './App.css';

function App() {
  const [data , setData] = useState([]);

  useEffect(() => {
    try {
      axios.get("http://localhost:8888/Routes/read.php")
      .then(function (response){
        setData(response.data["notes"]);
      })  
    } catch (error) {
      console.error(error)
    }
  },[])

  console.log(data)

  const jsxMapNotes = data.map((value , key) => {
    return <Note key={key} uid={value["uid"]} auther={value["auther"]} note={value["note"]} compleated={value["compleated"]}/>
  })

  return (
    <>
      <div className='w-screen h-screen grid justify-center'>
        <NewNoteButton/>
        <div className='justify-center'>
          {jsxMapNotes}
        </div>
      </div>
    </>
  )
}

export default App
