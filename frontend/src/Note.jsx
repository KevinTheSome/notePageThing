function Note(props) {
    return (
      <>
      <div className="bg-gray-400">
        <h2>{props.auther}</h2>
        <p>{props.note}</p>
        <input checked={props.compleated} type="checkbox"/>
        <button className="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Del</button>
      </div>
      </>
    )
  }
  
  export default Note;
  