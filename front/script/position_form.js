const e = React.createElement;

class LikeButton extends React.Component {
    constructor(props) {
        super(props);
        this.state = {liked: false};
    }

    render() {
        if (this.state.liked) {
            return 'You liked this.';
        }

        return (
            <div>
                Hello there!
            </div>
        );
    }
}

const domContainer = document.querySelector('#position_container');
ReactDOM.render(LikeButton, domContainer);