A packer configuration to build an AWS AMI (Amazon Machine Image) based on
AlmaLinux OS 8 (EL8 compatible) with PHP 8.0 pre-installed.

**Requires:** [packer](https://www.packer.io/),
[ansible](https://docs.ansible.com/ansible/latest/installation_guide/intro_installation.html) and a AWS account.

**Optional:** [vagrant](https://www.vagrantup.com/) and [VirtualBox](https://www.virtualbox.org/) for local testing.

**Note:** by default it will build a public AMI named "AlmaLinux OS 8.4-PHP8.0". If you don't want
to build a public image, remove/change the `ami_groups = ["all"]` line in template.pkr.hcl


### Quick Start

```
$ packer init config.pkr.hcl

$ export AWS_ACCESS_KEY_ID=...
$ export AWS_SECRET_ACCESS_KEY=...
$ export AWS_DEFAULT_REGION=...

$ packer build template.pkr.hcl
```


It is recommended to generate a separate AWS user with limited set of permissions for
packer builds. The minimal AWS permissions policy during AMI build, per the official
[packer documentation](https://www.packer.io/docs/builders/amazon#iam-task-or-instance-role), is the
following:

```json
{
    "Version": "2012-10-17",
    "Statement": [{
        "Resource": "*",
        "Effect": "Allow",
        "Action": [
            "ec2:AttachVolume",
            "ec2:AuthorizeSecurityGroupIngress",
            "ec2:CopyImage",
            "ec2:CreateImage",
            "ec2:CreateKeypair",
            "ec2:CreateSecurityGroup",
            "ec2:CreateSnapshot",
            "ec2:CreateTags",
            "ec2:CreateVolume",
            "ec2:DeleteKeyPair",
            "ec2:DeleteSecurityGroup",
            "ec2:DeleteSnapshot",
            "ec2:DeleteVolume",
            "ec2:DeregisterImage",
            "ec2:DescribeImageAttribute",
            "ec2:DescribeImages",
            "ec2:DescribeInstances",
            "ec2:DescribeInstanceStatus",
            "ec2:DescribeRegions",
            "ec2:DescribeSecurityGroups",
            "ec2:DescribeSnapshots",
            "ec2:DescribeSubnets",
            "ec2:DescribeTags",
            "ec2:DescribeVolumes",
            "ec2:DetachVolume",
            "ec2:GetPasswordData",
            "ec2:ModifyImageAttribute",
            "ec2:ModifyInstanceAttribute",
            "ec2:ModifySnapshotAttribute",
            "ec2:RegisterImage",
            "ec2:RunInstances",
            "ec2:StopInstances",
            "ec2:TerminateInstances"
        ]
    }]
}
```

