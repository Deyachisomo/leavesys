export class LeaveRequest {
    constructor(
        public employeeId: number,
        public startDate: Date,
        public endDate: Date,
        public reason: string
    ) {}

    getDuration(): number {
        const oneDay = 24 * 60 * 60 * 1000;
        return Math.round((this.endDate.getTime() - this.startDate.getTime()) / oneDay);
    }
}
