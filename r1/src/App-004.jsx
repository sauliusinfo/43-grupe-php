// import logo from './logo.svg';
import 'bootstrap/dist/css/bootstrap.min.css';
import './App.scss';
import Dogs from './Components/004/Dogs';

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

        <Dogs />

      </header>
    </div>
  );
}

export default App;
