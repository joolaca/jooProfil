import AOS from "aos";
import "aos/dist/aos.css";
import './css/App.scss';
import Hero from './components/Hero.jsx';
import Welcome from './components/Welcome.jsx';
import SimpleText from './components/SimpleText.jsx';
import Berry from './components/Berry.jsx';
import Brick from './components/Brick.jsx';


function App() {

    AOS.init({
        duration : 2000
    });


  return (
    <div className="App">

        <Welcome />
        <Berry />
        <Hero />
        <Brick />
        <SimpleText />

    </div>
  );
}

export default App;
