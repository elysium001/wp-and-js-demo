// create simple web component.
export class GreetingComponent extends HTMLElement {
    constructor() {
        super();
        this.innerHTML = '<h1>Hello World! From the GreetingComponent</h1>';
    }

    connectedCallback() {
        console.log('connected');
    }

    disconnectedCallback() {
        console.log('disconnected');
    }

}

