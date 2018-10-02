import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router, Route, Link, Switch} from 'react-router-dom'
import Header from './Components/Header';
import Footer from './Components/Footer';
import ErrorBoundary from "./ErrorBoundary/ErrorBoundary";


export default class Index extends Component {
    render() {
        return (
            <ErrorBoundary>
                <div className='background'>
                <div className="container headerContainer" >
                    <Header/>
                </div>
                </div>
                <Footer/>
            </ErrorBoundary>
        );
    }
}

if (document.getElementById('index')) {
    ReactDOM.render(<Index/>, document.getElementById('index'));
}
