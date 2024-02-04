import { useState,useEffect } from 'react'
import NewNote from './NewNote.jsx'
import axios from 'axios';
import './App.css'

function App() {
  const [data , setData] = useState([]);

  useEffect(() => {
    try {
      axios.get("http://localhost:8888/")
      .then(function (response){
        setData(response.data);
      })
    } catch (error) {
      console.error(error)
    }
  },[])

  return (
    <>
      <div className='w-screen h-screen grid justify-center bg-gray-300'>
        <NewNote/>
        <div className=" bg-gray-400 rounded-sm p-2 grid">
          <h2 className="font-sans text-slate-700">The Auther</h2>
        </div>
      </div>
    </>
  )
}

export default App
