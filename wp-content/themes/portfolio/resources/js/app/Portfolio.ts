import {settings} from "./settings";
import {ToolsAnimation} from "./ToolsAnimation";

export class Portfolio {
    private readonly noJsClassName: string;
    private toolsAnimation: ToolsAnimation;
    private readonly scrollPosition: { value: number };

    constructor() {
        this.noJsClassName = settings.noJsClassName;
        this.toolsAnimation = new ToolsAnimation;
        this.scrollPosition = {value: 0};

        addEventListener('load', () => this.init());
    }

    init() {
        this.removeNoJsClass();
        this.toolsAnimation.init(this.scrollPosition);

        this.addEventListeners();
    }

    private removeNoJsClass() {
        document.querySelectorAll('.' + this.noJsClassName).forEach((noJsItem) => {
            noJsItem.classList.remove(this.noJsClassName);
        });
    }

    private addEventListeners() {
        // To only activate eventListener if it's needed
        if (this.toolsAnimation.isActive) {
            this.scrollPosition.value = window.scrollY;
            document.addEventListener('scroll', (e) => {
                this.scrollPosition.value = window.scrollY;
                this.toolsAnimation.onScroll();
            });
            document.addEventListener('resize', () => {
                this.toolsAnimation.recalculateOffset();
            });
        }
    }
}