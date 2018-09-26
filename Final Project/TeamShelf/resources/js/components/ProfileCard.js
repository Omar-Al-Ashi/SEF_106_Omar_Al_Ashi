import React, {Component} from 'react';
import 'font-awesome/css/font-awesome.min.css';


require('../styles/styles.css');

export default class ProfileCard extends Component {

    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div>
                <div>
                    <div className='floatLeft'>
                        <div className="card" key={this.props.id}>
                            <img
                                // TODO need to find a way not to input relative path
                                // src={require('../../../storage/app/public/images/TeamShelf.png')}
                                src={(this.props.user_image)}
                                className='profileImage'
                                alt={this.props.first_name + " " + this.props.last_name}
                            />
                            <div>
                                <div>
                                    <h1>
                                        {this.props.first_name} {this.props.last_name}
                                    </h1>
                                    <p className="title">
                                        {this.props.title}
                                    </p>
                                </div>
                            </div>
                            <p>
                                {this.props.university}
                            </p>
                            <div className='socialMedia'>
                                {/*TODO edit the icon name*/}
                                <div><a
                                    href={'http://' + this.props.linkedin}><i
                                    className="fa fa-linkedin"/></a></div>
                                <div><a
                                    href={'http://' + this.props.github}><i
                                    className="fa fa-github"/></a></div>
                            </div>
                            <button className='contactButton whiteText'>
                                <a className='whiteText'
                                   href={"mailto:" + this.props.email + "?subject=We Are" +
                                   " interested in your Resume&body=Dear Mr. " + this.props.last_name
                                   + ".\n We are interested in your CV"}>Contact</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}