import React, {Component} from 'react';
require('../styles/styles.css');

export default class Footer extends Component {

    render() {
        return (
            <footer class="page-footer font-small blue pt-4 white footer">

                <div class="container-fluid text-center text-md-left">
                </div>
                <div class="footer-copyright text-center py-3">© 2018 Copyright:
                    <a href="https://teamshelf.com"> TeamShelf.com</a>
                </div>

            </footer>
        );
    }
}

