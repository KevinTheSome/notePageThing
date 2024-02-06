import { useState, useEffect } from "react";
import { redirect } from "react-router-dom";
import axios from 'axios';
import NewNoteButton from "./NewNoteButton.jsx";

function Create() {
  const [auther, setAuther] = useState("");
  const [note, setNote] = useState("");
  const [boolComp, setBoolComp] = useState(false);

  function sendData() {
    try {
      axios.post("http://localhost:8888/", {
        auther: auther, note: note, boolComp: boolComp
      });
      setAuther("");
      setNote("");
      setBoolComp(false);
      throw redirect("/");
    } catch (error) {
      console.error(error);
    }
  }

  return (
    <>
      <div className="w-screen h-screen grid justify-center bg-gray-300">
        <NewNoteButton />
        <div className=" bg-gray-400 rounded-sm p-2 grid">
          <label>
            Auther:
            <input type="text" value={auther} onChange={(e) =>{setAuther(e.target.value)}}/>
          </label>
          <label>
            Note:
            <input type="text" value={note} onChange={(e) =>{setNote(e.target.value)}}/>
          </label>
          <button onClick={sendData}>Create a new note</button>
        </div>
      </div>
    </>
  );
}

export default Create;
