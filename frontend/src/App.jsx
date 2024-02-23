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
      <div className='w-screen h-screen grid justify-center bg-gray-300'>
        <NewNoteButton/>
        <div className=" bg-gray-400 rounded-sm p-2 grid">
          <h2 className="font-sans text-slate-700">The Auther</h2>
        </div>
        {jsxMapNotes}
      </div>
    </>
  )
}

export default App
