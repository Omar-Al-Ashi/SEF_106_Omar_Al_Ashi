import React, {Component} from 'react';
import axios from "axios";
import 'font-awesome/css/font-awesome.min.css';
import html2canvas from "html2canvas";
import jsPDF from "jspdf";

export default class GraduateInfo extends Component {
    constructor(props) {
        super(props);

        this.state = {
            admins: [],
            id: '',
            dob: '',
            email: '',
            gender: '',
            phone: '',
            selectedFile: '',
            first_name: '',
            last_name: '',
            residency_location: '',
            major: '',
            institute: '',
            education_start_date: '',
            education_end_date: '',
            experience_starting_date: '',
            experience_ending_date: '',
            job_location: '',
            gpa: '',
            certificate_name: '',
            education_description: '',
            isCurrentJob: null,
            experience_start_date: '',
            experience_end_date: '',
            title: '',
            company_name: '',
            company_location: '',
            description: '',
            skills: '',
            skill_level: '',
            linkedin: '',
            github: '',
        };

        this.printDocument = this.printDocument.bind(this);

    }

    componentWillMount() {
        axios.get('/api' + this.props.location.pathname).then(response => {
            this.setState({
                dob: response.data[0].DOB,
                id: response.data[0].id,
                email: response.data[0].email,
                certificate_name: response.data[0].certificate_degree_name,
                company_name: response.data[0].company_name,
                phone: response.data[0].contact_number,
                education_description: response.data[0].description,
                residency_location: response.data[0].residency_location,
                first_name: response.data[0].first_name,
                gender: response.data[0].gender,
                github: response.data[0].github,
                experience_starting_date: response.data[0].starting_date,
                education_starting_date: response.data[0].starting_date,
                experience_ending_date: response.data[0].ending_date,
                education_ending_date: response.data[0].ending_date,
                gpa: response.data[0].grade_gpa,
                institute: response.data[0].institute_university_name,
                company_location: response.data[0].job_location,
                title: response.data[0].job_title,
                skills: response.data[0].skill_set_name,
                job_location: response.data[0].job_location,
                last_name: response.data[0].last_name,
                linkedin: response.data[0].linkedin,
                major: response.data[0].major,
                skill_level: response.data[0].skill_level,
                skill_set_name: response.data[0].skill_set_name,
                selectedFile: response.data[0].user_image,
            });
            console.log(response);
            console.log("The image is:" + this.state.selectedFile);
        }).catch(errors => {
            console.log(errors.response);
        })
    }

    printDocument() {
        const input = document.getElementById('divToPrint');
        html2canvas(input)
            .then((canvas) => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('l', 'mm', [255, 210]);
                pdf.addImage(imgData, 'JPEG', 0, 0);
                // pdf.output('dataurlnewwindow');
                pdf.save("CV_" + this.state.first_name + "_" + this.state.last_name + ".pdf");
            })
        ;
    }

    render() {

        return (
            <div>
                <div className='background container resumeContainer'
                     id="divToPrint">
                    <div className="mainDetails">
                        <div id="headshot" className="quickFade">
                            {console.log('the file state is: ' + this.state.selectedFile)}
                            {this.state.selectedFile.trim() === "" ? (
                                'nothing'
                            ) : (
                                <img
                                    // src={require('../../../storage/app/public/images/'+this.props.user_image)}
                                    src={require('../../../../public/images/' + this.state.selectedFile)}
                                    alt={this.state.first_name + this.state.last_name}/>
                            )}
                        </div>

                        <div id="name">
                            <h1 className="quickFade delayTwo">{this.state.first_name + " " + this.state.last_name}</h1>
                            <h2 className="quickFade delayThree">{this.state.title}</h2>
                        </div>

                        <div id="contactDetails"
                             className="quickFade delayFour">
                            <ul>
                                <li><strong>email: </strong> <a
                                    href={"mailto:" + this.state.email + "?subject=We Are" +
                                    " interested in your Resume&body=Dear Mr. " + this.state.last_name
                                    + ".\n We are interested in your CV"}
                                    target="_blank">{this.state.email}</a></li>
                                <li><strong>phone: </strong>{this.state.phone}
                                </li>
                            </ul>
                        </div>
                        <div className="clear"></div>
                    </div>

                    <div id="mainArea" className="quickFade delayFive">
                        <section>
                            <article>
                                <div className="sectionTitle">
                                    <h1>Personal Profile</h1>
                                </div>


                                <div className="sectionContent">
                                    <p>
                                        <strong>Gender: </strong> {this.state.gender}
                                    </p>
                                    <p><strong>Date of
                                        birth: </strong> {this.state.dob}</p>
                                    <p><strong>Residency
                                        Location: </strong>{this.state.residency_location}
                                    </p>
                                </div>
                            </article>
                            <div className="clear"></div>
                        </section>

                        <section>
                            <div className="sectionTitle">
                                <h1>Work Experience</h1>
                            </div>

                            <div className="sectionContent">
                                <article>
                                    <h2 className='header'>{this.state.title}</h2>
                                    <p className="subDetails">{this.state.experience_starting_date} - {this.state.experience_ending_date}</p>
                                    <p>{this.state.company_name} - {this.state.job_location}</p>
                                    <p>{this.state.description}</p>
                                    <p>{this.state.skills}</p>
                                </article>
                            </div>
                            <div className="clear"></div>

                            <section>
                                <div className="sectionTitle">
                                    <h1>Education</h1>
                                </div>

                                <div className="sectionContent">
                                    <article>
                                        <h2 className='header'>{this.state.institute}</h2>
                                        <p className="subDetails">{this.state.certificate_name}</p>
                                        <p className="subDetails">{this.state.education_starting_date} - {this.state.education_ending_date}</p>
                                        <p/>
                                        <p>{this.state.education_description}</p>
                                    </article>


                                </div>
                                <div className="clear"></div>
                            </section>
                        </section>
                    </div>
                    <div className='socialMediaContainer'>
                        <a
                            href={'http://' + this.state.linkedin}><i
                            className="fa fa-linkedin fa-2x marginRight"/>
                        </a>
                        <a
                            href={'http://' + this.state.github}><i
                            className="fa fa-github fa-2x"/>
                        </a>
                    </div>
                </div>
                <button onClick={this.printDocument}
                        className="btn marginTop">Print resume as PDF
                </button>
            </div>
        );
    }
}