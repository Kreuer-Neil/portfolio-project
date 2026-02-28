import {settings} from "./settings";

export class ToolsAnimation {
    private toolsContainer: HTMLElement;
    private readonly openSectionClassName: string;
    private scrollPosition: { value: number };
    public readonly isActive: boolean;
    private open: boolean;
    private comparativeToolsContainerPosition: number;

    constructor() {
        this.toolsContainer = document.querySelector('.' + settings.tools.toolsContainerCassName);
        this.openSectionClassName = settings.tools.openedClassName;
        this.isActive = this.toolsContainer != null;
        this.open = false;
    }

    init(scrollPosition: { value: number }): void {
        this.scrollPosition = scrollPosition;
        if (this.isActive) {
            this.toolsContainer.classList.remove(this.openSectionClassName);
            this.onScroll();
            this.recalculateOffset();
        }
    }

    // TODO change to make it autonomous
    /// Called when scroll is detected on the other side
    public onScroll() {
        // Decides if this is relevant
        if (this.isActive) {

            // Defines if it should open or not
            this.openSectionSwich(this.scrollPosition.value >= this.comparativeToolsContainerPosition);
        }
    }

    public recalculateOffset() {
        if (this.isActive)
            this.comparativeToolsContainerPosition =
                this.toolsContainer.offsetTop -
                window.visualViewport.height * settings.scroll.sectionAppearRatio;
    }

    /// Opens or closes the section. Argument sets if it should be open or closed by now.
    openSectionSwich(open: boolean = true) {
        if (open && !this.open)
            this.toolsContainer.classList.add(this.openSectionClassName);
        else if (!open && this.open)
            this.toolsContainer.classList.remove(this.openSectionClassName);
        this.open = open;
    }
}