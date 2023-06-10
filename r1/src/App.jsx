// Bank1-v2
import React, { useState, useEffect } from 'react';

const App = _ => {
  const [saskaitos, setSaskaitos] = useState([]);
  const [vardas, setVardas] = useState('');
  const [pavarde, setPavarde] = useState('');
  const [naujaSuma, setNaujaSuma] = useState(0);
  const [pasirinktaSaskaita, setPasirinktaSaskaita] = useState(null);
  
  // Gaunami duomenys is LocalStorage
  useEffect( _ => {
    const storedSaskaitos = localStorage.getItem('saskaitos');
    if (storedSaskaitos) {
        setSaskaitos(JSON.parse(storedSaskaitos));
    }
  }, []);

  const writeDataToLocalStorage = (data) => {
    localStorage.setItem('saskaitos', JSON.stringify(data));
  };

  const pridetiSaskaita = _ => {
    const naujaSaskaita = {
      vardas,
      pavarde,
      suma: 0
    };

    setSaskaitos([...saskaitos, naujaSaskaita]);
    setVardas('');
    setPavarde('');

    writeDataToLocalStorage([...saskaitos, naujaSaskaita]);
  };

  const istrintiSaskaita = (index) => {
    const saskaita = saskaitos[index];

    if (saskaita.suma === 0) {
      const naujosSaskaitos = [...saskaitos];
      naujosSaskaitos.splice(index, 1);
      setSaskaitos(naujosSaskaitos);

      writeDataToLocalStorage(naujosSaskaitos);
    } else {
      alert('Negalima ištrinti sąskaitos, kurioje yra lėšų!');
    }
  };

  const pridetiLesas = (index) => {
    const naujosSaskaitos = [...saskaitos];
    naujosSaskaitos[index].suma += naujaSuma;
    setSaskaitos(naujosSaskaitos);
    setNaujaSuma(0);

    writeDataToLocalStorage(naujosSaskaitos);
  };

  const nuskaiciuotiLesas = (index) => {
    const naujosSaskaitos = [...saskaitos];
    const updatedSuma = naujosSaskaitos[index].suma - naujaSuma;

    if (updatedSuma >= 0) {
      naujosSaskaitos[index].suma = updatedSuma;
      setSaskaitos(naujosSaskaitos);
      setNaujaSuma(0);

      writeDataToLocalStorage(naujosSaskaitos);
    } else {
      alert('Neužtenka sąskaitoje lėšų!');
    }
  };

  return (
    <div style={{maxWidth:'50%'}}>
      <h1>:: SAULĖS MIESTO BANKAS ::</h1>
      <h2>Naujos sąskaitos sukūrimas</h2>
      <label>Vardas:</label>
      <input type="text" value={vardas} onChange={(e) => setVardas(e.target.value)} />
      <label>Pavardė:</label>
      <input type="text" value={pavarde} onChange={(e) => setPavarde(e.target.value)} />
      <button onClick={pridetiSaskaita}>Sukurti sąskaitą</button>
      <hr />
      <table>
        <thead>
          <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Sąskaitos suma</th>
            <th>Veiksmai</th>
          </tr>
        </thead>
        <tbody>
          {saskaitos
            .sort((a, b) => a.pavarde.localeCompare(b.pavarde))
            .map((saskaita, index) => (
              <tr key={index}>
                <td>{saskaita.vardas}</td>
                <td>{saskaita.pavarde}</td>
                <td>{saskaita.suma}{' Eur'}</td>
                <td>
                  {pasirinktaSaskaita === index ? (
                    <>
                      <input type='number'
                        value={naujaSuma !== 0 ? naujaSuma.toString() : ""}
                        onChange={(e) => setNaujaSuma(parseInt(e.target.value))}
                        placeholder='pvz: 100'
                      />
                      <button onClick={_ => pridetiLesas(index)}>Pridėti lėšas</button>
                      <button onClick={_ => nuskaiciuotiLesas(index)}>Nuskaičiuoti lėšas</button>
                    </>
                  ) : (
                    <button onClick={_ => setPasirinktaSaskaita(index)}>Pasirinkti</button>
                  )}
                  <button onClick={_ => istrintiSaskaita(index)}>Ištrinti</button>
                </td>
              </tr>
            ))}
        </tbody>
      </table>
    </div>
  );
};

export default App;