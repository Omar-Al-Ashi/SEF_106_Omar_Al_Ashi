import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router, Route, Link, Switch} from 'react-router-dom'
import Header from './components/Header';
import Footer from './components/Footer';
import ErrorBoundary from "./ErrorBoundary/ErrorBoundary";


export default class Index extends Component {
    render() {
        return (
            <ErrorBoundary>
                <div className={"container"}>
                    <Header/>
                </div>
                <Footer/>
            </ErrorBoundary>
        );
    }
}

if (document.getElementById('index')) {
    ReactDOM.render(<Index/>, document.getElementById('index'));
}
