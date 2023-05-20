// import logo from './logo.svg';
import 'bootstrap/dist/css/bootstrap.min.css';
import './App.scss';
import './buttons.scss';
import Buttons from './Components/005/Buttons';

function App() {

  return (
    <div className="App">
      <header className="App-header">
        {/* <img src={logo} className="App-logo" alt="logo" /> */}
        {/* <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a> */}

        <Buttons />

      </header>
    </div>
  );
}

export default App;
