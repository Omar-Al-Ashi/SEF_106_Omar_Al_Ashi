import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Link, Switch} from 'react-router-dom'
import Header from './components/Header';
import Footer from './components/Footer';
import Example from './components/Example';



export default class Index extends Component {
    render() {
        return (
            <div className={"container"}>
                <Header/>
                <Footer/>
            </div>
        );
    }
}

if (document.getElementById('index')) {
    ReactDOM.render(<Index/>, document.getElementById('index'));
}
