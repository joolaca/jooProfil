import React, { Component } from 'react';
import i18n,{t} from 'i18next';

class Welcome extends Component {

    constructor(props) {
        super(props);
        switch (localStorage.getItem('lang')) {
            case 'hu':
                this.state = {'languageTitle': 'en'};
                break;
            case 'en':
                this.state = {'languageTitle': 'hu'};
                break;
            default:
                localStorage.setItem('lang', 'hu');
        }
    }

    changeLanguage = () => {
        switch (localStorage.getItem('lang')) {
            case 'hu':
                localStorage.setItem('lang', 'en');
                i18n.changeLanguage("en");
                this.setState({ languageTitle : 'hu' });
                break;
            case 'en':
                localStorage.setItem('lang', 'hu');
                i18n.changeLanguage("hu");
                this.setState({ languageTitle : 'en' });
                break;
            default:
                localStorage.setItem('lang', 'en');
                this.setState({ languageTitle : 'hu' });
                break;
        }
        window.location.reload();
    }
    render() {

        return(

        <div className="welcome-container">
            <section className="py-5 text-center ">
                <div className="row ">
                    <div className="col-lg-6 mx-auto ">
                        <img src="/img/welcome_white.png" className="img-welcome" alt=""/>
                        <h1 className="fs-1">
                            <h1>
                                {t('welcome_1')}
                                <br/>
                                {t('welcome_2')}
                            </h1>
                        </h1>
                    </div>
                </div>
            </section>
            <section id="language-selector" onClick={this.changeLanguage}> {this.state.languageTitle} </section>
        </div>
        )
    }
}

export default Welcome;