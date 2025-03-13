import { LeaveRequest } from './LeaveRequest';

export class LeaveManager {
    private leaveRequests: LeaveRequest[] = [];

    addLeaveRequest(leaveRequest: LeaveRequest): void {
        this.leaveRequests.push(leaveRequest);
    }

    getLeaveRequests(): LeaveRequest[] {
        return this.leaveRequests;
    }

    getTotalLeaveDays(employeeId: number): number {
        return this.leaveRequests
            .filter(request => request.employeeId === employeeId)
            .reduce((total, request) => total + request.getDuration(), 0);
    }
}
