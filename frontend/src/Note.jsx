import axios from 'axios';
import { useState,useEffect } from 'react';

function Note(props) {

  const uid = props.uid;
  const [compleated,setCompleated] = useState(props.compleated);
  async function delData() {
    try {
      axios.post("http://localhost:8888/Routes/delete.php", {
        uid:uid,
      })
      .then(function (response) {
        if (response.status === 200) {
          window.location.reload(false);
        }
        return null;
      })
    } catch (error) {
      console.error(error)
    }
  }

  async function updateCopleated() {
    setCompleated(!compleated);
    try {
      axios.post("http://localhost:8888/Routes/update.php", {
        uid:uid,
      })
      .then(function (response) {
        if (response.status === 200) {
          window.location.reload(false);
        }
        return null;
      })
    } catch (error) {
      console.error(error)
    }
  }

    return (
      <>
      <div className="bg-gray-400 border-4 grid-cols-4 grid-rows-2 border-gray-400 grid rounded m-1 h-20">
        <h2 className="col-span-3 col-start-1 row-start-1">{props.auther}</h2>
        <p  className="col-span-3 col-start-1 row-start-2">{props.note}</p>
        <input onChange={updateCopleated} checked={compleated} type="checkbox" className='col-start-4 row-start-2'/>
        <button onClick={delData} className="bg-gray-300 hover:bg-gray-100 text-gray-800 font-semibold m-1 border border-gray-400 rounded shadow col-start-4 row-start-1">X</button>
      </div>
      </>
    )
  }
  
  export default Note;
  