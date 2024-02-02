import { useState,useEffect } from 'react'
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

    console.log(data);
  return (
    <>
      <div className='w-screen h-screen grid justify-center content-center'>
        <div className=" bg-white shadow rounded">
          <h1 className="font-sans text-slate-700">Hello from react and vite and tailwindcss</h1>
          <p className="font-sans text-slate-700">{data.test}</p>
        </div>
      </div>
    </>
  )
}

export default App
