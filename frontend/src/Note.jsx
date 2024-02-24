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
      <div className="bg-gray-400">
        <h2>{props.auther}</h2>
        <p>{props.note}</p>
        <input onChange={updateCopleated} checked={compleated} type="checkbox"/>
        <button onClick={delData} className="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Del</button>
      </div>
      </>
    )
  }
  
  export default Note;
  