import React, { Component } from 'react';

class Welcome extends Component {
    render() {
        return(
        <div>
            <section className="py-5 text-center welcome-container">
                <div className="row ">
                    <div className="col-lg-6 mx-auto ">
                        <img src="/img/welcome_white.png" className="img-welcome" alt=""/>
                        <h1 className="fs-1">Üdvözöllek weboldalamon, <br/> Joó László vagyok. </h1>
                    </div>
                </div>
            </section>
        </div>
        )
    }
}

export default Welcome;