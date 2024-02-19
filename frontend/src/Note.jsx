function Note(props) {
    return (
      <>
      <div className="bg-gray-400">
        <h2>{props.auther}</h2>
        <p>{props.note}</p>
        <input checked={props.compleated} type="checkbox"/>
      </div>
      </>
    )
  }
  
  export default Note;
  