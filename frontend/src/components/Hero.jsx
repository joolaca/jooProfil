import React, { Component } from 'react';
import axios from 'axios';
import htmlParser from 'html-react-parser';
class Hero extends Component {

    constructor(props) {
        super(props);

        this.state = {
            activeHeroeIcon :0,
            heroeIcons: [],
        };
    }


    componentDidMount() {

        const params = { slug: 'hero-section',};

        axios.get('api/section', {params} )
            .then((response) => {

                const data = response.data;
                this.setState({
                    activeHeroeIcon: data[0].id,
                    heroeIcons : data
                });
            })
            .catch((error) => {
                console.log(error);
            });
    }


    render() {

        return(
            <div className="container">
                <div className="row hero-container">

                    <div className="col-md-5 hero-img-container">

                        <img className="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                            alt="Profil"
                            src={"./img/hero/joo.png"} width="500" />
                        <div className="hero-icon-container">
                            {this.state.heroeIcons.map((item, index) => {
                                let className = item.image ;
                                if(item.id === this.state.activeHeroeIcon) {
                                    className += ' active animate__animated animate__heartBeat '
                                }
                                return <i key={item.id} className={className}></i>
                            })}
                        </div>

                    </div>

                    <div className="col-md-7 hero-description-container">
                        <div className="hero-button-container">
                            {this.state.heroeIcons.map((item, index) => {
                                return <button onClick={() => this.setState({ activeHeroeIcon: item.id })}
                                               key={item.id}
                                               className="btn-joo" >
                                    {item.name}
                                    </button>
                            })}
                        </div>

                        {this.state.heroeIcons.filter(heroeIcons => heroeIcons.id === this.state.activeHeroeIcon).map(heroeIcons => (
                            <div key={heroeIcons.id}>
                                <header className="title">{heroeIcons.title}</header>
                                <p className="description">{htmlParser(heroeIcons.description)}</p>
                            </div>

                        ))}
                    </div>

                </div>
            </div>

        )
    }
}

export default Hero;

