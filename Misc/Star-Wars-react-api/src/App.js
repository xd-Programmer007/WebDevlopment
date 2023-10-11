import React from 'react';
import './App.css';

class Image extends React.Component{
  render(){
    return (
      <img src ={this.props.url} alt = {this.props.name}></img>
    )
  }
}
class Starwars extends React.Component{
  constructor(){
    super()
    this.state = {
      loadedCharacters : false,
      name : null,
      weight  : null,
      height : null,
      homeworld : null,
      image : null,
    }
  }
  randomizedCharacters(){
    const randomNumber = Math.round(Math.random() * 88);
    fetch(`https://akabab.github.io/starwars-api/api/id/${randomNumber}.json`)
      .then(response => response.json())
      .then(data => {
        this.setState({
          image : data.image,
          name : data.name,
          weight : data.mass,
          height : data.height,
          homeworld : data.homeworld, 
          loadedCharacters : true
      })})
  }
    render(){
  
      return (
        <>
        {
          this.state.loadedCharacters && 
          <div>
            <span><Image url = {this.state.image} name ={this.state.name} /></span>
            <h1>{this.state.name}</h1>
            <h3>{this.state.weight}</h3>
            <h3>{this.state.height}</h3>
            <h3><a href = {this.state.homeworld}>Homeworld</a></h3>
            
          </div>
        }
        <button onClick = {() => this.randomizedCharacters()}>Randomized Characters</button>
        </>
      )
    }
  }

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <Starwars/>
      </header>
    </div>
  );
}

export default App;
