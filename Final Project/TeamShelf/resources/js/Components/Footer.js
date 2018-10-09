import React, {Component} from 'react';

require('../Styles/Styles.css');

export default class Footer extends Component {

    render() {
        return (
            <footer className="page-footer font-small blue black footer">
                <div className="footer-copyright text-center py-3 whiteText">©
                    {(new Date().getFullYear())} Copyright:
                    <a href="https://teamshelf.com"
                       className='whiteText'> TeamShelf.com</a>
                </div>
            </footer>
        );
    }
}

