import { useState } from 'react'
import './App.css'

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
      <div className='w-screen h-screen grid justify-center content-center'>
        <div class=" bg-white shadow rounded">
          <h1 className="font-sans text-slate-700">Create a new note</h1>
        </div>
      </div>
    </>
  )
}

export default App
