import './App.css';
import {useState, useEffect} from 'react';
import Navbar from './components/Navbar'
import Home from './components/Home'
import AboutView from './components/AboutView'
import SearchView from './components/SearchView'
import { Routes, Route } from 'react-router-dom';

// if some problem persists for Router 
// use this https://github.com/ReactTraining/react-router/blob/f59ee5488bc343cf3c957b7e0cc395ef5eb572d2/docs/advanced-guides/migrating-5-to-6.md#relative-routes-and-links or https://stackoverflow.com/questions/70074873/reactjs-home-is-not-a-route-component-all-component-children-of-routes-m 

function App() {
  const [searchResults, setSearchResults] = useState([]);
  const [searchText, setSearchText] = useState('');

  
  return (
    <div>
      <Navbar searchText = {searchText} />
      <Routes>
        <Route exact path='/' element = {<Home/>} />
        <Route path='/about'  element = {<AboutView/>}/>
        <Route path='/search' element = {<SearchView keyword = {searchText} searchResults ={searchResults} />}/>
      </Routes>
    </div>
  );
}

export default App;
