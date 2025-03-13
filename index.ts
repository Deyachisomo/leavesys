import { LeaveRequest } from './LeaveRequest';
import { LeaveManager } from './LeaveManager';

const leaveManager = new LeaveManager();

const leave1 = new LeaveRequest(1, new Date('2023-11-01'), new Date('2023-11-05'), 'Vacation');
const leave2 = new LeaveRequest(1, new Date('2023-12-01'), new Date('2023-12-03'), 'Medical');

leaveManager.addLeaveRequest(leave1);
leaveManager.addLeaveRequest(leave2);

console.log(`Total leave days for employee 1: ${leaveManager.getTotalLeaveDays(1)}`);
console.log('All leave requests:', leaveManager.getLeaveRequests());
