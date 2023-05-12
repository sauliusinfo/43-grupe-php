import Style from "./Style";

export default function Dogs() {

    const dogs = ['šuo', 'šunius', 'Bobikas', 'kudlius', 'Šarikas', 'avigalvis'];

    return (
        <>
        <Style />
        <div className="sq-bin">
            {
            dogs.map((d, i) => <div index={i} className="sq" style={{marginBottom: '20px'}}>{d}</div>)
            }
        </div>
        <div className="sq-bin">
            {
            dogs
            .sort((t1, t2) => t1.localeCompare(t2))
            .map((d, i) => <div index={i} className="sq" style={{borderRadius: '50%'}}>{i+1} - {d}</div>)
            }
        </div>
        </>
    );
}
